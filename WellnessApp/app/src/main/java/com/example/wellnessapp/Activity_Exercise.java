package com.example.wellnessapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.MenuItem;
import android.view.View;
import android.view.WindowManager;
import android.widget.TextView;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.util.Objects;

public class Activity_Exercise extends AppCompatActivity implements ExerciseInterface {
    public static final int REQUEST_CODE = 100;
    public static final int RESULT_SUCCESS = 101;
    public static final String EXTRAKEY_UID = "USER_ID";
    public static final String API = "http://127.0.0.1:8080/wellnessapp/api.php";
    private String user_id;
    private TextView tv_mark;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.score);

        BottomNavigationView bottomNavigationView=findViewById(R.id.navBar);
        bottomNavigationView.setSelectedItemId(R.id.score);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                switch(item.getItemId())
                {
                    case R.id.score:
                        return true;
                    case R.id.home:
                        startActivity(new Intent(getApplicationContext(),home.class));
                        overridePendingTransition(0,0);
                        return true;
                    case R.id.community:
                        startActivity(new Intent(getApplicationContext(),community.class));
                        overridePendingTransition(0,0);
                        return true;
                    case R.id.profile:
                        startActivity(new Intent(getApplicationContext(),profile.class));
                        overridePendingTransition(0,0);
                        return true;

                }
                return false;
            }
        });

        Objects.requireNonNull(getSupportActionBar()).hide();
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        user_id = "USR000";

        tv_mark = findViewById(R.id.tv_point_display);
        update_user_mark();

        //enable thread policy to call internet service with more application
        StrictMode.enableDefaults();
    }

    public void btn_breakfast_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act008");
        update_user_mark();
    }

    public void btn_lunch_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act005");
        update_user_mark();
    }

    public void btn_dinner_clicked(View view){
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act006");
        update_user_mark();
    }

    private void update_user_mark(){
        new APIFetcher(this).execute(API,"action=getMark&user_id="+user_id);
    }

    public void post_update_user_mark(String mark){
        tv_mark.setText(mark);
    }

    public void btn_exercise_clicked(View view) {
        Intent replyIntent = new Intent();
        replyIntent.putExtra(Activity_Exercise.EXTRAKEY_UID,user_id);
        setResult(RESULT_SUCCESS,replyIntent);
        finish();
    }

    public void btn_sit_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act000");
        update_user_mark();
    }

    public void btn_run_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act001");
        update_user_mark();
    }

    public void btn_weight_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act002");
        update_user_mark();
    }

    public void btn_cycling_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act003");
        update_user_mark();
    }

    public void btn_yoga_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act004");
        update_user_mark();
    }

    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        // Add code to update the database.
        if(requestCode == Activity_Exercise.REQUEST_CODE){
            if(resultCode == Activity_Exercise.RESULT_SUCCESS){
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

        user_id =savedInstanceState.getString(EXTRAKEY_UID);
    }
}