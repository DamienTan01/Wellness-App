package com.example.wellnessapp;

import android.content.Context;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLEncoder;

import javax.net.ssl.HttpsURLConnection;

public class APIFetcher extends AsyncTask<String, Integer, String> {
    private static final String DOMAIN_NAME = "http://192.168.128.41/tween";
    private ExerciseInterface context;

    APIFetcher(ExerciseInterface ctx){
        this.context = ctx;
    }

    private static final String readStream(InputStream is) throws IOException {
        BufferedReader r = new BufferedReader(new InputStreamReader(is));
        StringBuilder total = new StringBuilder();
        String line;
        while((line = r.readLine()) != null){
            total.append(line).append('\n');
        }
        r.close();
        return total.toString();
    }

    private static final void writeStream(OutputStream os, String data) throws IOException {
        BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(os,"UTF-8"));
        writer.write(data);
        writer.flush();
        writer.close();
    }

    protected String doInBackground(String... params){
        try {
            URL url = new URL(params[0]);
            HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
            urlConnection.setRequestMethod("POST");
            urlConnection.setConnectTimeout(2000);
            urlConnection.setReadTimeout(2000);
            urlConnection.setDoOutput(true);
            urlConnection.setDoInput(true);
            urlConnection.connect();

            String data = params[1];
            writeStream(urlConnection.getOutputStream(),data);

            if(urlConnection.getResponseCode() == HttpsURLConnection.HTTP_OK) {
                InputStream input = new BufferedInputStream(urlConnection.getInputStream());
                String response = readStream(input);

                return response;
            }
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (ProtocolException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return "";
    }

    protected void onProgressUpdate(Integer... progress){

    }

    protected void onPostExecute(String result){
        Log.d("Exe",result);
        JSONObject response = null;
        try {
            response = new JSONObject(result);

            if(response.has("result") && response.getString("result").equalsIgnoreCase("true")){
                if(response.has("mark")){
                    context.post_update_user_mark(response.getString("mark"));
                }
                else {
                    Log.d("Exe", "Your point has been updated!");
                }
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}
