package com.example.wellnessapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class Activity_Exercise extends AppCompatActivity implements ExerciseInterface {
    public static final String EXTRAKEY_UID = "USER_ID";
    public static final String API = "http://192.168.0.175:8080/wellnessapp/api.php";
    private String user_id;
    private TextView tv_mark;
    private TextView tv_achievement1;
    private TextView tv_achievement2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_exercise);

        user_id = "USR000";

        tv_mark = findViewById(R.id.tv_point_display);
        tv_achievement1 = findViewById(R.id.tv_achievement);
        tv_achievement2 = findViewById(R.id.tv_achievement2);
        update_user_achievement();
        update_user_mark();

        //enable thread policy to call internet service with more application
        StrictMode.enableDefaults();
    }

    public void btn_breakfast_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act008");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_lunch_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act005");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_dinner_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act006");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_rest_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act007");
        update_user_mark();
        update_user_achievement();
    }

    private void update_user_mark(){
        new APIFetcher(this).execute(API,"action=getMark&user_id="+user_id);
    }

    public void post_update_user_mark(String mark){
        tv_mark.setText(mark);
    }

    private void update_user_achievement(){
        new APIFetcher(this).execute(API,"action=getAchievement&user_id="+user_id+"&index=0");
        new APIFetcher(this).execute(API,"action=getAchievement&user_id="+user_id+"&index=1");
    }

    public void post_update_user_achievement(String content, int index){
        switch(index){
            case 0:
                tv_achievement1.setText(content);
                break;
            case 1:
                tv_achievement2.setText(content);
                break;
        }
    }

    public void btn_meal_clicked(View view){
        Intent intentExercise = new Intent(this,Exercise2Activity.class);
        startActivityForResult(intentExercise,Exercise2Activity.REQUEST_CODE);
    }

    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        // Add code to update the database.
        if(requestCode == Exercise2Activity.REQUEST_CODE){
            if(resultCode == Exercise2Activity.RESULT_SUCCESS){
                user_id = data.getStringExtra(EXTRAKEY_UID);
            }
        }
    }

    @Override
    protected void onSaveInstanceState(@NonNull Bundle outState) {
        super.onSaveInstanceState(outState);

        outState.putString(EXTRAKEY_UID,user_id);
    }

    @Override
    protected void onRestoreInstanceState(@NonNull Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);
        update_user_mark();
        update_user_achievement();

        user_id =savedInstanceState.getString(EXTRAKEY_UID);
    }
}