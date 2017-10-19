import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PaginaInicialComponent } from './pagina-inicial/pagina-inicial.component';
import { PaginaLoginComponent } from './pagina-login/pagina-login.component';

const APP_ROUTES: Routes = [
    { path: '', component: PaginaInicialComponent },
    {path: 'login', component: PaginaLoginComponent}
];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);