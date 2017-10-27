import { HttpModule } from '@angular/http';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EditarComponent } from './editar/editar.component';
import { RemoverComponent } from './remover/remover.component';

@NgModule({
  imports: [
    CommonModule,
    HttpModule
  ],
  declarations: [EditarComponent, RemoverComponent]
})
export class AdminModule { }
