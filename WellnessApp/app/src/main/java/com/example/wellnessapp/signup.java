package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;

public class signup extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);

        TextView txtLogin = findViewById(R.id.loginText);
        txtLogin.setOnClickListener(view -> {
            Intent intent = new Intent(this, login.class);
            startActivity(intent);
        });

        ImageButton btnSignup = findViewById(R.id.btnSignup);
        btnSignup.setOnClickListener(view -> {
            Intent intent = new Intent(this, login.class);
            startActivity(intent);
        });
    }
}