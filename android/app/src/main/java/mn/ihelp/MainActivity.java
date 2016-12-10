package mn.ihelp;

import android.content.DialogInterface;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.CookieSyncManager;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import mn.ihelp.MyAlertDialog;
import mn.ihelp.R;
import mn.ihelp.ConnectionDetector;

public class MainActivity extends AppCompatActivity {

    Boolean isInternetPresent = false;
    MyAlertDialog alert = new MyAlertDialog();
    ConnectionDetector cd;
    private WebView myBlogWeb;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        myBlogWeb = (WebView)findViewById(R.id.myBlogView);
        WebSettings settings = myBlogWeb.getSettings();
        CookieSyncManager.createInstance(this);
        settings.setJavaScriptEnabled(true);
        myBlogWeb.setScrollBarStyle(View.SCROLLBARS_OUTSIDE_OVERLAY);
        myBlogWeb.setScrollBarStyle(View.SCROLLBARS_OUTSIDE_OVERLAY);
        myBlogWeb.getSettings().setJavaScriptEnabled(true);
        cd = new ConnectionDetector(this);
        isInternetPresent = cd.isConnectingToInternet();
        if (isInternetPresent) {
            myBlogWeb.setWebViewClient(new WebViewClient() {

                public boolean shouldOverrideUrlLoading(WebView view, String url) {
                    Log.i("WebContent", "Navigating to " + url);
                    view.loadUrl(url);
                    return true;
                }

                public void onPageFinished(WebView view, String url) {
                    Log.i("WebContent", "Finished loading of " + url);
                }

                public void onReceivedError(WebView view, int errorCode, String errorDescription, String errorUrl) {
                    Log.e("Programmer", "ERR AT   -> " + errorUrl);
                    Log.e("WebContent", "ERR CODE -> " + errorCode);
                    Log.e("WebContent", "ERR MSG  -> " + errorDescription);
                    //new Spawner().spawnView(WebContent.this, Offline.class); //TODO: Replace the offline-activity with an server-offline-activity
                }
            });
            myBlogWeb.loadUrl("http://tortuvshin.github.io");

        } else {
            new android.app.AlertDialog.Builder(this,R.style.AppTheme)
                    .setIcon(R.drawable.fail)
                    .setTitle("Интернэт холболтоо шалгана уу !!!")
                    .setMessage("Интернэтэд холбогдоогүй байна !!!")
                    .setPositiveButton("Тийм", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            finish();
                        }
                    })
                    .setNegativeButton("Үгүй", null)
                    .show();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
