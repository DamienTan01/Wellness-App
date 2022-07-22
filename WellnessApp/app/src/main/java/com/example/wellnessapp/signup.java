package com.example.wellnessapp;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;
import com.google.firebase.auth.FirebaseAuth;

import java.util.Objects;

public class signup extends AppCompatActivity {
    EditText mUsername, mEmail, mPassword;
    ImageButton btnSignup;
    TextView btnLogin;
    FirebaseAuth fauth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);

        Objects.requireNonNull(getSupportActionBar()).hide();
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        mUsername = findViewById(R.id.user);
        mEmail = findViewById(R.id.email);
        mPassword = findViewById(R.id.pass);
        btnSignup = findViewById(R.id.btnSignup);
        btnLogin = findViewById(R.id.loginText);
        fauth = FirebaseAuth.getInstance();

//        if (fauth.getCurrentUser() != null){
//            startActivity(new Intent(getApplicationContext(), signup.class));
//            finish();
//        }

        btnSignup.setOnClickListener(view -> {
            String email = mEmail.getText().toString().trim();
            String password = mPassword.getText().toString().trim();

            if (TextUtils.isEmpty(email)){
                mEmail.setError("Email is required");
                return;
            }

            if (TextUtils.isEmpty(password)){
                mPassword.setError("Password is required");
                return;
            }

            if (password.length() < 6) {
                mPassword.setError("Password Must be >= 6 Characters");
                return;
            }

            //Register user into Firebase
            fauth.createUserWithEmailAndPassword(email, password).addOnCompleteListener(task -> {
                if (task.isSuccessful()){
                    Toast.makeText(signup.this, "Registered Successfully", Toast.LENGTH_SHORT).show();
                    startActivity(new Intent(getApplicationContext(), main.class));
                }
                else {
                    Toast.makeText(signup.this, task.getException().getMessage(), Toast.LENGTH_SHORT).show();
                }
            });
        });

        @SuppressLint("CutPasteId") TextView txtLogin = findViewById(R.id.loginText);
        txtLogin.setOnClickListener(view -> {
            Intent intent = new Intent(this, main.class);
            startActivity(intent);
        });
    }
}