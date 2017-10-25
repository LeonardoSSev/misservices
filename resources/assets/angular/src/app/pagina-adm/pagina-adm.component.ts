import { Http } from '@angular/http';
import { Component, OnInit } from '@angular/core';

import 'rxjs/add/operator/map';

@Component({
  selector: 'app-pagina-adm',
  templateUrl: './pagina-adm.component.html',
  styleUrls: ['./pagina-adm.component.css']
})
export class PaginaAdmComponent implements OnInit {

  private users = [];
  constructor(private http: Http) { }

  ngOnInit() {
    setTimeout(() => {
      this.listaUsers()
      .subscribe(data => this.users = data);
    }, 100);
  }

  listaUsers(){
     return this.http.get('/api/admin')
     .map(response => response.json());
  }

}
