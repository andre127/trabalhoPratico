package unigran.projeto.br.Classes;

import java.io.Serializable;

public class Locacao implements Serializable {
    //criação dos atributos de locação
    private Integer dataDevolucao, dataRetirada;
    private Integer id;
    private Integer km;
    private Integer cpfCliene, cpfFuncionario;
    private String placaCarro, situaçaos;

    //get e set dos atributos

    public String getSituaçaos() {
        return situaçaos;
    }
    public void setSituaçaos(String situaçaos) {
        this.situaçaos = situaçaos;
    }
    public String getPlacaCarro() {
        return placaCarro;
    }
    public Integer getDataDevolucao() {
        return dataDevolucao;
    }
    public void setDataDevolucao(Integer dataDevolucao) {
        this.dataDevolucao = dataDevolucao;
    }
    public Integer getDataRetirada() {
        return dataRetirada;
    }
    public void setDataRetirada(Integer dataRetirada) {
        this.dataRetirada = dataRetirada;
    }
    public Integer getId() {
        return id;
    }
    public void setId(Integer id) {
        this.id = id;
    }
    public Integer getKm() {
        return km;
    }
    public void setKm(Integer km) {
        this.km = km;
    }
    public void setPlacaCarro(String placaCarro) {
        this.placaCarro = placaCarro;
    }
    public Integer getCpfCliene() {
        return cpfCliene;
    }
    public void setCpfCliene(Integer cpfCliene) {
        this.cpfCliene = cpfCliene;
    }

    public Integer getCpfFuncionario() {
        return cpfFuncionario;
    }

    public void setCpfFuncionario(Integer cpfFuncionario) {
        this.cpfFuncionario = cpfFuncionario;
    }


    //tostring para mostrar apenas esses dados no listar
    @Override
    public String toString() {
        return "CPF Cliente:  "+getCpfCliene()+
                "\nData Locação:  "+getDataRetirada()+
                "\nData Devolução:  "+getDataDevolucao()+
                "\nPlaca: "+getPlacaCarro()+
                "\nKM :"+getKm()+
                "\n Situação: "+getSituaçaos();
    }
}