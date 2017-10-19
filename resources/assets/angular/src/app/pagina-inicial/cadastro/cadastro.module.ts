import { Http, HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CadastroComponent } from './cadastro.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    Http,
    HttpModule
  ],
  declarations: [
    CadastroComponent
  ]
})
export class CadastroModule { }
