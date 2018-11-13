package unigran.projeto.br.gerenciamento;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import unigran.projeto.br.locaplus.R;

public class GerVeiculo extends AppCompatActivity {

    Button btNovo;
    Button btEditar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ger_veiculo);
    }

    public void cadVei(View view){
        Intent it = new Intent(this, unigran.projeto.br.locaplus.CadastrarVeiculo.class);
        startActivity(it);
    }
    public void listVei(View view){
        Intent it = new Intent(this, unigran.projeto.br.Listagem.ListarVeiculo.class);
        startActivity(it);
    }
}
