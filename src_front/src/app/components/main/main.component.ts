import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiService } from 'src/app/service/api.service';
import { Car } from "src/app/interface/car";
import { ClientRequest } from 'src/app/interface/request';
import { Router } from '@angular/router';
import { MatDialog } from '@angular/material/dialog';
import { ThanksComponent } from '../thanks/thanks.component';

@Component({
  selector: 'cars-wrapper-list',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.css']
})
export class MainComponent implements OnInit {
  public cars$: Observable<Car[]>
  public selected_car: Car
  constructor(private api: ApiService, private router: Router, private dialog: MatDialog) { 
      this.cars$ = this.api.getCars();
  }

  selectCar(car: Car){
    this.selected_car = car;
  }

  clearSelected(){
    this.selected_car = null;
  }

  openDialog(){
    const dialogRef = this.dialog.open(ThanksComponent,{})
    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
  }

  accept(data: ClientRequest){
    console.log('accept', data);
    this.api.saveRequest(data).subscribe(()=>{
      this.clearSelected();
      this.openDialog();
    },(err)=>{
      window.alert('К сожалению произошла ошибка. Попробуйте проверить соединение с интернетом, заполненные даннные и отправить заявку повторно')
    })
  }

  ngOnInit(): void {
  }

}
