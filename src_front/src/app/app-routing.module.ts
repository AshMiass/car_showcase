import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { WrapperListComponent } from "./components/wrapper/list/wrapperlist.component"
import { ThanksComponent } from "./components/thanks/thanks.component";

const routes: Routes = [
  { 
    path: 'list', component: WrapperListComponent,
    // children: [
    //   {
    //     path: 'thnx', // child route path
    //     component: ThanksComponent, // child route component that the router renders
    //   }
    // ],
  },
  {path: 'thnx', component: ThanksComponent},
  { path: '',   redirectTo: '/list', pathMatch: 'full' }, // redirect to `WrapperListComponent`
  { path: '**', component: WrapperListComponent },  // Wildcard route for a 404 page
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
