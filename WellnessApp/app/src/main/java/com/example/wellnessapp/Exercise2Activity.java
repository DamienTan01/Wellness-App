package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.TextView;

public class Exercise2Activity extends AppCompatActivity implements ExerciseInterface {

    public static final int REQUEST_CODE = 100;
    public static final int RESULT_SUCCESS = 101;
    public static final String API = "http://192.168.0.175/wellnessapp/api.php";
    private String user_id;
    private TextView tv_mark;
    private TextView tv_achievement1;
    private TextView tv_achievement2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_exercise2);

        Intent i = getIntent();
        user_id = "USR000";

        tv_mark = findViewById(R.id.tv_point_display);
        tv_achievement1 = findViewById(R.id.tv_achievement);
        tv_achievement2 = findViewById(R.id.tv_achievement2);
        update_user_achievement();
        update_user_mark();

        //enable thread policy to call internet service with more application
        StrictMode.enableDefaults();
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

    public void btn_exercise_clicked(View view) {
        Intent replyIntent = new Intent();
        replyIntent.putExtra(Activity_Exercise.EXTRAKEY_UID,user_id);
        setResult(RESULT_SUCCESS,replyIntent);
        finish();
    }

    public void btn_sit_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act000");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_run_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act001");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_weight_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act002");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_cycling_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act003");
        update_user_mark();
        update_user_achievement();
    }

    public void btn_yoga_clicked(View view) {
        new APIFetcher(this).execute(API,"action=newActivity&user_id="+user_id+"&action_id=act004");
        update_user_mark();
        update_user_achievement();
    }
}