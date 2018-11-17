package unigran.projeto.br.Classes;

import java.io.Serializable;

public class Locacao implements Serializable {
    private Float dataDevolucao, dataRetirada;
    private Integer id;
    private Float kmFinal;
    private Cliente cliente;
    private Veiculo veiculo;
    //private  funcio

    public Veiculo getVeiculo() {
        return veiculo;
    }
    public void setVeiculo(Veiculo veiculo) {
        this.veiculo = veiculo;
    }
    public Cliente getCliente() {
        return cliente;
    }
    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }
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
}
