package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.media.Image;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.widget.ImageButton;
import android.widget.TextView;

import java.util.Objects;

public class main extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);

        Objects.requireNonNull(getSupportActionBar()).hide();
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        TextView txtSignup = findViewById(R.id.signupText);
        txtSignup.setOnClickListener(view -> {
            Intent intent = new Intent(this, signup.class);
            startActivity(intent);
        });

        ImageButton login = findViewById(R.id.login);
        login.setOnClickListener(view -> {
            Intent intent = new Intent(this, home.class);
            startActivity(intent);
        });
    }
}