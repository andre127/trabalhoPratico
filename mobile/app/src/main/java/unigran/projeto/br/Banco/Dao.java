package unigran.projeto.br.Banco;

import java.util.LinkedList;
import java.util.List;

import unigran.projeto.br.locaplus.CadastrarFuncionario;
import unigran.projeto.br.Classes.Pessoa;
import unigran.projeto.br.locaplus.CadastrarVeiculo;

public class Dao {
    private static List listaCliente;
    private static List listaVeiculo;
    private static List listaFuncionario;

    private Dao(){

    }
    public static void salvarCliente(Pessoa p){
        if(listaCliente.contains(p)){
            listaCliente.set(listaCliente.indexOf(p),p);
        }else
            listaCliente.add(p);
    }
    public static void salvarFuncionario(CadastrarFuncionario f){
        if(listaFuncionario.contains(f)){
            listaFuncionario.set(listaFuncionario.indexOf(f),f);
        }else
            listaFuncionario.add(f);
    }
    public static void salvarVeiculo(CadastrarVeiculo v){
        if(listaVeiculo.contains(v)){
            listaVeiculo.set(listaVeiculo.indexOf(v),v);
        }else
            listaVeiculo.add(v);
    }


    public static List listarCliente(){
        if(listaCliente==null)
            listaCliente = new LinkedList();

        return listaCliente;
    }
}
