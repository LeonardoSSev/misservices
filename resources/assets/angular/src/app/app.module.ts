import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { PaginaInicialComponent } from './pagina-inicial/pagina-inicial.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { PaginaLoginComponent } from './pagina-login/pagina-login.component';
import { InicioComponent } from './pagina-inicial/inicio/inicio.component';
import { ComoFuncionaComponent } from './pagina-inicial/como-funciona/como-funciona.component';
import { CategoriasComponent } from './pagina-inicial/categorias/categorias.component';
import { CadastroComponent } from './pagina-inicial/cadastro/cadastro.component';
import { PaginaAdmComponent } from './pagina-adm/pagina-adm.component';
import { routing } from './app.routing';

@NgModule({
  declarations: [
    AppComponent,
    PaginaInicialComponent,
    HeaderComponent,
    FooterComponent,
    PaginaLoginComponent,
    InicioComponent,
    ComoFuncionaComponent,
    CategoriasComponent,
    CadastroComponent,
    PaginaAdmComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    routing
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
