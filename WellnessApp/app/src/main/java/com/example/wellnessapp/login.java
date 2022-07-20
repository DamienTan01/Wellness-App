package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageButton;
import android.widget.TextView;

public class login extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        ImageButton login = findViewById(R.id.login);
        login.setOnClickListener(view -> {
            Intent intent = new Intent(this, home.class);
            startActivity(intent);
        });

        TextView txtSign = findViewById(R.id.signupText);
        txtSign.setOnClickListener(view -> {
            Intent intent = new Intent(this, signup.class);

            startActivity(intent);
        });
    }
}