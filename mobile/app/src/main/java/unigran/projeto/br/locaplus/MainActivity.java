package unigran.projeto.br.locaplus;

import android.app.AlertDialog;
import android.arch.lifecycle.LifecycleOwner;
import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;



import java.util.LinkedList;
import java.util.List;

import unigran.projeto.br.Classes.Locacao;
import unigran.projeto.br.Classes.Veiculo;
import unigran.projeto.br.Listagem.ListarCliente;
import unigran.projeto.br.Listagem.ListarLocacao;
import unigran.projeto.br.Listagem.ListarVeiculo;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.gerenciamentoLocacao.LocacaoRetirada;

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    private ListView lista;
    private SQLiteDatabase conexao;
    private Banco bd;
    private LoginActivity loginActivity = new LoginActivity();
    private String entrou;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        lista=findViewById(R.id.listarVeiculosMain);

        conexaoBD();
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);



        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        acoes();

    }
    private void conexaoBD() {
        try {
            bd= new Banco(this);
            Toast.makeText(this,"Conexão ok",Toast.LENGTH_SHORT).show();

        }catch (SQLException ex){
            AlertDialog.Builder msg= new AlertDialog.Builder(this);
            msg.setTitle("Erro");
            msg.setMessage("Erro de conexão");
            msg.setNegativeButton("ok",null);
            msg.show();
        }
    }

    private void acoes() {
        lista.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView adapterView, View view, int i, long l) {
                Toast.makeText(MainActivity.this, "id:"+i, Toast.LENGTH_LONG).show();
                Intent it = new Intent(MainActivity.this, LocacaoRetirada.class);
                Veiculo veiculo = (Veiculo) adapterView.getItemAtPosition(i);
                it.putExtra("locacao", veiculo);
                startActivity(it);
            }
        });
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
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

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    private List listar(){

        conexao=bd.getReadableDatabase();
        List veiculos = new LinkedList();
        Cursor res= conexao.rawQuery("SELECT * FROM VEICULO", null);

        if(res.getCount()>0){
            res.moveToFirst();
            do{
                Veiculo v = new Veiculo();
                v.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
                v.setNome(res.getString(res.getColumnIndexOrThrow("NOME")));
                v.setPlaca(res.getString(res.getColumnIndexOrThrow("PLACA")));
                v.setMarca(res.getString(res.getColumnIndexOrThrow("MARCA")));
                v.setModelo(res.getString(res.getColumnIndexOrThrow("MODELO")));
                v.setCor(res.getString(res.getColumnIndexOrThrow("COR")));
                v.setImg(res.getString(res.getColumnIndexOrThrow("IMG")));
                v.setValorLocacao(res.getFloat(res.getColumnIndexOrThrow("VALORLOCACAO")));
                v.setValorSeguro(res.getFloat(res.getColumnIndexOrThrow("VALORSEGURO")));
                v.setStatus(res.getInt(res.getColumnIndexOrThrow("ATIVO")));
                veiculos.add(v);
            }while (res.moveToNext());
        }
        return  veiculos;
    }
    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_login) {
            Intent it = new Intent(MainActivity.this, LoginActivity.class);
            startActivity(it);
        } else if (id == R.id.nav_carros) {
                Intent it = new Intent(MainActivity.this, ListarVeiculo.class);
                startActivity(it);
        } else if (id == R.id.nav_clientes) {
            Intent it = new Intent(this, ListarCliente.class);
            startActivity(it);
        } else if (id == R.id.nav_locacoes) {
            Intent it = new Intent(this, ListarLocacao.class);
            startActivity(it);
        } else if (id == R.id.nav_funcionarios) {

        } else if (id == R.id.nav_exit) {
            this.finishAffinity();

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
    @Override
    protected void onResume() {
        super.onResume();
        ArrayAdapter<Veiculo> arrayAdapter = new ArrayAdapter<Veiculo>(MainActivity.this,android.R.layout.simple_expandable_list_item_1, listar());
        lista.setAdapter(arrayAdapter);
    }
}
