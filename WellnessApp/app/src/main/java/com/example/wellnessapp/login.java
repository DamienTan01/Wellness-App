package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

public class login extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        TextView txtSign = findViewById(R.id.txtSignup);

        txtSign.setOnClickListener(view -> {
            Intent intent = new Intent(this, signup.class);

            startActivity(intent);
        });
    }
}