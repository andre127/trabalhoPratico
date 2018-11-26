package unigran.projeto.br.Pesistencia;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class Banco extends SQLiteOpenHelper {
 public Banco (Context context){
     super(context,"BANCOLOCAPLUS",null,1);
 }
    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        //definição dos SQL que serão utilizados na criação do banco de dados
        String sqlCliente ="CREATE TABLE IF NOT EXISTS CLIENTE(" +"ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,"
                +"NOME VARCHAR(45),"
                +"ENDERECO VARCHAR(15),"
                +"CPF VARCHAR(15),"
                +"LOGIN VARCHAR(15),"
                +"SENHA VARCHAR(15),"
                +"RG VARCHAR(15),"
                +"CNH VARCHAR(15),"
                +"NUMERODEPENDENTES INTEGER);";

        String sqlLocacao = "CREATE TABLE IF NOT EXISTS LOCACAO(" +"ID_LOCACAO INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,"
                +" DATALOCACAO INTEGER ,"
                +" DATADEVOLUCAO INTEGER ,"
                +"QUILOMETRAGEM INTEGER(35),"
                +" CPFCLIENTE INTEGER(35),"
                +" CPFFUNCIONARIO INTEGER(35),"
                +" SITUACAO VARCHAR(35),"
                +" PLACACARRO VARCHAR(30));";

        String sqlFuncionario ="CREATE TABLE IF NOT EXISTS FUNCIONARIO(" +"ID_FUNCIONARIO INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,"
                +"NOME VARCHAR(45),"
                +" ENDERECO VARCHAR(15),"
                +" CPF VARCHAR(15),"
                +" RG VARCHAR(15),"
                +" DATAADMISSAO VARCHAR(15),"
                + "DATADEMISSAO INTEGER);";

        String sqlVeiculo = "CREATE TABLE IF NOT EXISTS VEICULO(" +"ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,"
                +" PLACA VARCHAR(15),"
                +" NOME VARCHAR(50),"
                +" MODELO VARCHAR(20),"
                +" VALORSEGURO VARCHAR(15),"
                +" VALORLOCACAO VARCHAR(15),"
                +" ATIVO BOOLEAN,"
                +" MARCA VARCHAR(15),"
                +" IMG VARCHAR(30),"
                +"COR VARCHAR(15));";






        String sqlInserirVeiculo = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('0','htt222','carro1','honda fit','1000','500','1','honda','carro1','prata');";
        String sqlInserirVeiculo2 = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('1','htt222','carro2','honda civic','1000','600','1','honda','carro1','prata');";
        String sqlInserirVeiculo3 = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('2','htt222','carro3','onix','1000','800','1','honda','carro1','prata');";
        String sqlInserirVeiculo4 = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('3','234234','carro4','onix','1000','900','1','honda','carro1','prata');";
        String sqlInserirVeiculo5 = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('4','htt222','carro5','onix','1000','800','1','honda','carro1','prata');";
        String sqlInserirVeiculo6 = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('5','htt222','carro6','onix','1000','800','1','honda','carro1','prata');";
        String sqlInserirVeiculo7 = "INSERT INTO VEICULO ('ID','PLACA','NOME','MODELO','VALORSEGURO','VALORLOCACAO','ATIVO','MARCA','IMG','COR') values ('6','htt222','carro7','onix','1000','800','1','honda','carro1','prata');";
        String sqlInserirCliente1 = "INSERT INTO CLIENTE ('ID','NOME','ENDERECO','CPF','RG','CNH','LOGIN','SENHA','NUMERODEPENDENTES') values ('0','JUNES ANDERSON','RUA CASA DO KRL','04644478','45465','55555','admin','admin','1');";
        String sqlInserirCliente2 = "INSERT INTO CLIENTE ('ID','NOME','ENDERECO','CPF','RG','CNH','LOGIN','SENHA','NUMERODEPENDENTES') values ('1','ANDRE LUIZ','RUA CASA aff','04644478','45465','55555','andre','andre','1');";

        String locacao = "INSERT INTO LOCACAO ('ID_LOCACAO','DATALOCACAO','DATADEVOLUCAO','QUILOMETRAGEM','CPFCLIENTE','CPFFUNCIONARIO','PLACACARRO') values ('1','2','3','4','5','6','7');";



        //executando todos os SQL's acima, alem da criação do BD tambem esta sendo feita a inserção de dados para fins de teste
        sqLiteDatabase.execSQL(sqlCliente);
        sqLiteDatabase.execSQL(sqlVeiculo);
        sqLiteDatabase.execSQL(sqlLocacao);
        sqLiteDatabase.execSQL(sqlFuncionario);
        sqLiteDatabase.execSQL(sqlInserirVeiculo);
        sqLiteDatabase.execSQL(sqlInserirVeiculo2);
        sqLiteDatabase.execSQL(sqlInserirVeiculo3);
        sqLiteDatabase.execSQL(sqlInserirVeiculo4);
        sqLiteDatabase.execSQL(sqlInserirVeiculo5);
        sqLiteDatabase.execSQL(sqlInserirVeiculo6);
        sqLiteDatabase.execSQL(sqlInserirVeiculo7);
        sqLiteDatabase.execSQL(sqlInserirCliente1);
        sqLiteDatabase.execSQL(sqlInserirCliente2);
        sqLiteDatabase.execSQL(locacao);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
