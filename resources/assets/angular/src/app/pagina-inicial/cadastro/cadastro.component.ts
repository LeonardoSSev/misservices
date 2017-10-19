import { Http, HttpModule } from '@angular/http';
import { Component, OnInit } from '@angular/core';
import { CadastroModule } from './cadastro.module';
import 'rxjs/add/operator/map';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent implements OnInit {

  usuario: any = {
    nome: null,
    email: null
  }
  
  constructor(private http: Http) { }

  ngOnInit() {
  }

  onSubmit(form){
    console.log(form.value);

    form.value
    console.log(this.usuario);

  }

  consultaCEP(cep, form){

    cep = cep.replace(/\D/g, '');

    if(cep != ""){
      var validacep = /^[0-9]{8}$/;

        if(validacep.test(cep)){
          this.http.get(`//viacep.com.br/ws/${cep}/json`)
          .map(dados => dados.json())
          .subscribe(dados => this.populaDados(dados, form));
        }
    }

  }

  populaDados(dados, form){
    form.setValue({
        nome: form.value.nome,
        email: form.value.email,
        cpf: form.value.cpf,
        cep: dados.cep,
        uf: dados.uf,
        cidade: dados.localidade,
        bairro: dados.bairro,
        endereco: dados.logradouro
      });
  }

}
