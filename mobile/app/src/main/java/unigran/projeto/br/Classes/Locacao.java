package unigran.projeto.br.Classes;

import java.io.Serializable;

public class Locacao implements Serializable {
    private Float dataDevolucao, dataRetirada;
    private Integer id;
    private Float kmInicial, kmFinal;
    private Integer idCliente;
    private String placaCarro;
    private Integer idFuncionario;

    public String getPlacaCarro() {
        return placaCarro;
    }

    public void setPlacaCarro(String placaCarro) {
        this.placaCarro = placaCarro;
    }



    public Integer getIdFuncionario() {
        return idFuncionario;
    }

    public void setIdFuncionario(Integer idFuncionario) {
        this.idFuncionario = idFuncionario;
    }

    public Integer getIdCliente() {
        return idCliente;
    }

    public void setIdCliente(Integer idCliente) {
        this.idCliente = idCliente;
    }



//private  funcio


    public Float getDataDevolucao() {
        return dataDevolucao;
    }
    public void setDataDevolucao(Float dataDevolucao) {
        this.dataDevolucao = dataDevolucao;
    }
    public Float getDataRetirada() {
        return dataRetirada;
    }
    public void setDataRetirada(Float dataRetirada) {
        this.dataRetirada = dataRetirada;
    }
    public Integer getId() {
        return id;
    }
    public void setId(Integer id) {
        this.id = id;
    }
    public Float getKmFinal() {
        return kmFinal;
    }
    public void setKmFinal(Float kmFinal) {
        this.kmFinal = kmFinal;
    }

    public void encerrarLocacao(Integer data, Float km){

    }
    public void manterLocacao(){

    }
    public void selecionarLocacao(){

    }

    public Float getKmInicial() {
        return kmInicial;
    }

    public void setKmInicial(Float kmInicial) {
        this.kmInicial = kmInicial;
    }
}
