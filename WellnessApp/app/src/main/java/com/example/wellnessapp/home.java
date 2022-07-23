package com.example.wellnessapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.view.WindowManager;
import android.widget.TextView;

import java.util.Objects;

public class home extends AppCompatActivity implements HomeInterface{
    public static final int REQUEST_CODE = 100;
    public static final int RESULT_SUCCESS = 101;
    public static final String EXTRAKEY_UID = "USER_ID";
    public static final String API = "http://127.0.0.1:8080/wellnessapp/healthtips.php";
    private TextView tv_tips;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home);

        Objects.requireNonNull(getSupportActionBar()).hide();
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        tv_tips = findViewById(R.id.textView2);
        tv_tips = findViewById(R.id.textView3);
        tv_tips = findViewById(R.id.textView4);
        tv_tips = findViewById(R.id.textView5);
        }

    @Override
    public void post_update_user_tips(String tips) {
        tv_tips.setText(tips);
    }
}


