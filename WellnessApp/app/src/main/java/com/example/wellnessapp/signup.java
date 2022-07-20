package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;

public class signup extends AppCompatActivity {
    ImageButton signup;
    EditText txtUser, txtEmail, txtPass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);

        TextView txtLogin = findViewById(R.id.loginText);
        txtLogin.setOnClickListener(view -> {
            Intent intent = new Intent(this, login.class);

            startActivity(intent);
        });

        //User Registration
        txtUser = (EditText)findViewById(R.id.user);
        txtEmail = (EditText)findViewById(R.id.email);
        txtPass = (EditText)findViewById(R.id.pass);
        ImageButton signup = findViewById(R.id.signup);

        signup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String username = txtUser.getText().toString();
                String email = txtEmail.getText().toString();
                String password = txtPass.getText().toString();
            }
        });
        signup.setOnClickListener(view -> {
            Intent intent = new Intent(this, login.class);
            startActivity(intent);


        });
    }
}