import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListComponent } from "./components/list/list.component"


const routes: Routes = [
  { path: 'list', component: ListComponent },
  { path: '',   redirectTo: '/list', pathMatch: 'full' }, // redirect to `ListComponent`
  { path: '**', component: ListComponent },  // Wildcard route for a 404 page
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
