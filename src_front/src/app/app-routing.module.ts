import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MainComponent } from "./components/main/main.component"

const routes: Routes = [
  { 
    path: 'list', component: MainComponent,
  },
  { path: '',   redirectTo: '/list', pathMatch: 'full' }, // redirect to `WrapperListComponent`
  { path: '**', component: MainComponent },  // Wildcard route
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes),
  ],
  providers: [
    
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
