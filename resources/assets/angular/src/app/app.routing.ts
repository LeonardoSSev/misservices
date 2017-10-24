import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PaginaInicialComponent } from './pagina-inicial/pagina-inicial.component';
import { PaginaLoginComponent } from './pagina-login/pagina-login.component';
import { PaginaAdmComponent } from './pagina-adm/pagina-adm.component';

import {AuthGuard} from "./guards/auth.guard";

const APP_ROUTES: Routes = [
    {path: 'admin', component: PaginaAdmComponent, canActivate: [AuthGuard]},
    {path: '', component: PaginaInicialComponent },
    {path: 'login', component: PaginaLoginComponent}
];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);