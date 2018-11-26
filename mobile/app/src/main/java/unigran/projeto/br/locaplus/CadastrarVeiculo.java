package unigran.projeto.br.locaplus;

import android.content.ContentValues;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.Toast;

import unigran.projeto.br.Classes.Veiculo;
import unigran.projeto.br.Pesistencia.Banco;

public class CadastrarVeiculo extends AppCompatActivity {
    private Veiculo veiculo;
    private EditText placa;
    private EditText nome;
    private EditText modelo;
    private EditText valorSeguro;
    private EditText valorLocacao;
    private EditText cor;
    private Switch ativo;
    private EditText marca;
    private EditText img;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cadastrar_veiculo);

        placa= findViewById(R.id.etPlaca);
        nome=findViewById(R.id.etNome);
        modelo=findViewById(R.id.etModelo);
        valorSeguro=findViewById(R.id.etValorSeguro);
        valorLocacao= findViewById(R.id.etValorLocacao);
        cor=findViewById(R.id.etCor);
        ativo= findViewById(R.id.stAtivo);
        marca= findViewById(R.id.etMarca);
        img= findViewById(R.id.etMarca);
    }

}
