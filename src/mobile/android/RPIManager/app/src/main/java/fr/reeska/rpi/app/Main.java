package fr.reeska.rpi.app;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.WebSettings;
import android.webkit.WebView;


public class Main extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        WebView webView = (WebView) findViewById(R.id.webView);

        WebSettings ws = webView.getSettings();

        ws.setJavaScriptEnabled(true); 			// Javascript activé
        //ws.setBuiltInZoomControls(true);		// Zoom activé (Pinch-to-zoom et bouton +/-)
        ws.setSupportZoom(true);
        ws.setDomStorageEnabled(true);

        ws.setAllowFileAccessFromFileURLs(true); //Maybe you don't need this rule
        ws.setAllowUniversalAccessFromFileURLs(true);

        webView.loadUrl("file:///android_asset/index.html");
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        if (id == R.id.action_settings) {
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
