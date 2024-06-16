package com.example.test2;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.util.Log;
import android.webkit.JavascriptInterface;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.core.content.FileProvider;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    private static final int CAMERA_REQUEST_CODE = 101;
    private static final int REQUEST_CALL_PERMISSION = 1;
    private static final int REQUEST_LOCATION_PERMISSION = 2;
    private LocationManager locationManager;
    private String currentPhotoPath;
    private WebView webView;
    private double longitude;
    private double latitude;
    private JavaScriptInterface jsInterface;
    String name = "", mbnum = "", outtyp = "", address = "", root = "", what = "";
    private String company;

    @SuppressLint("SetJavaScriptEnabled")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        webView = findViewById(R.id.webmain);
        webView.getSettings().setJavaScriptEnabled(true);
        webView.setWebViewClient(new WebViewClient());
        jsInterface = new JavaScriptInterface();
        webView.addJavascriptInterface(jsInterface, "AndroidFunction");
        webView.loadUrl("http://172.16.18.108/thevendors-android/html/android/login.php");

        locationManager = (LocationManager) getSystemService(LOCATION_SERVICE);

        // Check for location permission on start
        if (hasLocationPermission()) {
            requestLocationUpdate();
        } else {
            requestLocationPermission();
        }
    }

    private String url = "";
    private String data1 = "";
    private String data2 = "";
    private String companyy = "";

    public class JavaScriptInterface {
        @JavascriptInterface
        public void sendaurl(String url) {
            try {
                webView.loadUrl("http://172.16.18.108/thevendors-android/html/android/" + url);
            } catch (Exception e) {
                Log.e("JavaScriptInterface", "Error in sendaurl", e);
            }
        }

        @JavascriptInterface
        public void showToast() {
            try {
                if (hasCameraPermission()) {
                    startCamera();
                } else {
                    requestCameraPermission();
                }
            } catch (Exception e) {
                Log.e("JavaScriptInterface", "Error in showToast", e);
            }
        }

        @JavascriptInterface
        public void makeCall(String phoneNumber) {
            Log.e("hello","hellooooo");
            try {
                if (hasCallPermission()) {
                    Intent callIntent = new Intent(Intent.ACTION_CALL);
                    callIntent.setData(Uri.parse("tel:" + phoneNumber));
                    if (ActivityCompat.checkSelfPermission(MainActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                        return;
                    }
                    startActivity(callIntent);
                } else {
                    requestCallPermission();
                }
            } catch (Exception e) {
                Log.e("JavaScriptInterface", "Error in makeCall", e);
            }
        }

        @JavascriptInterface
        public void getUserLocation(String x,String y) {
            openGoogleMaps(Double.parseDouble(x),Double.parseDouble(y));
        }

        @JavascriptInterface
        public void VariablePass(String x, String y) {
            try {
                showMessage(x, y);
            } catch (Exception e) {
                Log.e("JavaScriptInterface", "Error in VariablePass", e);
            }
        }

        @JavascriptInterface
        public void sendtoadd(String name) {
            try {
                Log.e("JavaScriptInterface", "sendtoadd called with name: " + name);
            } catch (Exception e) {
                Log.e("JavaScriptInterface", "Error in sendtoadd", e);
            }
        }

        @JavascriptInterface
        public void linkChanger(String whati, String company) {
            companyy = company;
            try {
                what = whati;
                if (what.equals("outlet")) {
                    url = "http://172.16.18.108/thevendors-android/html/android/upload-outlet.php";
                    startCamera();
                } else if (what.equals("attendance")) {
                    url = "http://172.16.18.108/thevendors-android/html/android/upload-attendance.php";
                    startCamera();
                }
            } catch (Exception e) {
                Log.e("JavaScriptInterface", "Error in linkChanger", e);
            }
        }
    }



    @JavascriptInterface
    public void outlet(String name, String mbnum, String outtyp, String address, String root, String company) {
        this.name = name;
        Log.e("y", name);
    }


    private boolean hasCameraPermission() {
        return ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA) == PackageManager.PERMISSION_GRANTED;
    }

    private void requestCameraPermission() {
        ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CAMERA}, CAMERA_REQUEST_CODE);
    }

    private boolean hasCallPermission() {
        return ContextCompat.checkSelfPermission(this, Manifest.permission.CALL_PHONE) == PackageManager.PERMISSION_GRANTED;
    }

    private void requestCallPermission() {
        ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CALL_PHONE}, REQUEST_CALL_PERMISSION);
    }

    private boolean hasLocationPermission() {
        return ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED;
    }

    @SuppressLint("MissingPermission")
    private void requestLocationUpdate() {
        locationManager.requestSingleUpdate(LocationManager.NETWORK_PROVIDER, new LocationListener() {
            @Override
            public void onLocationChanged(@NonNull Location location) {
                latitude = location.getLatitude();
                longitude = location.getLongitude();
                transfer(latitude, longitude);
                Log.e("Location Update", "Latitude: " + latitude + ", Longitude: " + longitude);
            }

            @Override
            public void onProviderDisabled(@NonNull String provider) {
                Toast.makeText(MainActivity.this, "Please enable GPS and Internet", Toast.LENGTH_LONG).show();
            }
        }, null);
    }

    private void requestLocationPermission() {
        ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, REQUEST_LOCATION_PERMISSION);
    }

    private void startCamera() {
        Intent cameraIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        if (cameraIntent.resolveActivity(getPackageManager()) != null) {
            File photoFile = null;
            try {
                photoFile = createImageFile();
            } catch (IOException ex) {
                ex.printStackTrace();
            }
            if (photoFile != null) {
                Uri photoURI = FileProvider.getUriForFile(MainActivity.this,
                        "com.example.test2.fileprovider",
                        photoFile);
                cameraIntent.putExtra(MediaStore.EXTRA_OUTPUT, photoURI);
                startActivityForResult(cameraIntent, CAMERA_REQUEST_CODE);
            }
        }
    }

    private double[] transfer(double longitude, double latitude) {
        this.longitude = longitude;
        this.latitude = latitude;
        return new double[]{longitude, latitude};
    }

    private void openGoogleMaps(double latitude, double longitude) {
        String uri = "geo:" + latitude + "," + longitude + "?q=" + latitude + "," + longitude;
        Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(uri));
        intent.setPackage("com.google.android.apps.maps");

        if (intent.resolveActivity(getPackageManager()) != null) {
            startActivity(intent);
        } else {
            String webUri = "https://www.google.com/maps/search/?api=1&query=" +  longitude+ "," + latitude;
            Intent webIntent = new Intent(Intent.ACTION_VIEW, Uri.parse(webUri));
            startActivity(webIntent);
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == CAMERA_REQUEST_CODE && resultCode == RESULT_OK) {
            File imgFile = new File(currentPhotoPath);
            if (imgFile.exists()) {
                Bitmap imageBitmap = BitmapFactory.decodeFile(imgFile.getAbsolutePath());
                if (imageBitmap != null) {
                    double[] location = transfer(longitude, latitude);

                    uploadImage(imageBitmap, location[0], location[1]);
                } else {
                    Toast.makeText(this, "Failed to capture image", Toast.LENGTH_SHORT).show();
                }
            } else {
                Toast.makeText(this, "Failed to save image", Toast.LENGTH_SHORT).show();
            }
        }
    }

    void showMessage(String x, String y) {
        data1 = x;
        data2 = y;
    }

    private void uploadImage(Bitmap imageBitmap, double longitude, double latitude) {
        Toast.makeText(MainActivity.this, Double.toString(longitude), Toast.LENGTH_LONG).show();
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        imageBitmap.compress(Bitmap.CompressFormat.JPEG, 100, baos);
        byte[] imageBytes = baos.toByteArray();
        String base64Image = android.util.Base64.encodeToString(imageBytes, android.util.Base64.DEFAULT);

        Toast.makeText(getApplicationContext(), "Upload successful", Toast.LENGTH_SHORT).show();
        webView.reload();  // Ensure this is called after the successful upload message
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());

        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        webView.loadUrl("http://172.16.18.108/thevendors-android/html/android/login.php");
                        Log.e("error", response);

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(), "Upload failed: " + error.getLocalizedMessage(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("image", base64Image);
                if (what.equals("outlet")) {
                    params.put("company", companyy);
                    params.put("longitude", Double.toString(longitude));
                    params.put("latitude", Double.toString(latitude));
                } else {
                    params.put("user", data1 != null ? data1 : "");
                    params.put("company", data2 != null ? data2 : "");
                    params.put("longitude", Double.toString(longitude));
                    params.put("latitude", Double.toString(latitude));
                }
                return params;
            }
        };

        queue.add(stringRequest);
    }

    private File createImageFile() throws IOException {
        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
        String imageFileName = "JPEG_" + timeStamp + "_";
        File storageDir = getExternalFilesDir(Environment.DIRECTORY_PICTURES);
        File image = File.createTempFile(imageFileName, ".jpg", storageDir);

        currentPhotoPath = image.getAbsolutePath();
        return image;
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        switch (requestCode) {
            case CAMERA_REQUEST_CODE:
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    jsInterface.showToast();
                } else {
                    Toast.makeText(this, "Camera permission denied", Toast.LENGTH_SHORT).show();
                }
                break;
            case REQUEST_CALL_PERMISSION:
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    // Retry making the call
                    jsInterface.makeCall("9860974702");
                } else {
                    Toast.makeText(this, "Call permission denied", Toast.LENGTH_SHORT).show();
                }
                break;
            case REQUEST_LOCATION_PERMISSION:
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    requestLocationUpdate();
                } else {
                    Toast.makeText(this, "Location permission denied", Toast.LENGTH_SHORT).show();
                }
                break;
        }
    }
}
