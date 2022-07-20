package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageButton;
import android.widget.TextView;

public class signup extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);

        TextView txtLogin = findViewById(R.id.txtLogin);
        txtLogin.setOnClickListener(view -> {
            Intent intent = new Intent(this, login.class);

            startActivity(intent);
        });

        ImageButton signup = findViewById(R.id.signup);
        signup.setOnClickListener(view -> {
            Intent intent = new Intent(this, login.class);

            startActivity(intent);
        });
    }
}