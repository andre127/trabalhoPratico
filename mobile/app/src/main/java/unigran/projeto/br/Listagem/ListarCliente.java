package unigran.projeto.br.Listagem;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import unigran.projeto.br.Classes.Cliente;
import unigran.projeto.br.locaplus.R;

public class ListarCliente extends AppCompatActivity {
    private ListView listView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listar_cliente);
        listView=findViewById(R.id.listarCliente);

    }
    public void novoCadastroCliente(View view){

        Intent it = new Intent(ListarCliente.this,Cliente.class);
        startActivity(it);
    }

    @Override
    protected void onResume() {
        super.onResume();
       // ArrayAdapter<Cliente> adapter= new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, DaoLista.listar());
      //  listView.setAdapter(adapter);
    }
}
