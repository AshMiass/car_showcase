import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiService } from 'src/app/service/api.service';
import { Car } from "src/app/interface/car";
import { ClientRequest } from 'src/app/interface/request';
import { Router } from '@angular/router';

@Component({
  selector: 'cars-wrapper-list',
  templateUrl: './wrapperlist.component.html',
  styleUrls: ['./wrapperlist.component.css']
})
export class WrapperListComponent implements OnInit {
  public cars$: Observable<Car[]>
  public selected_car: Car
  constructor(private api: ApiService, private router: Router) { 
      this.cars$ = this.api.getCars()
  }
  selectCar(car: Car){
    this.selected_car = car;
  }
  clearSelected(){
    this.selected_car = null;
  }
  accept(data: ClientRequest){
    console.log('accept', data);
    this.api.saveRequest(data).subscribe((res)=>{
      this.clearSelected()
      this.router.navigate(['thnx', {}]);
    },(err)=>{
      window.alert('К сожалению произошла ошибка. Попробуйте проверить соединение с интернетом, заполненные даннные и отправить заявку повторно')
    })
  }
  ngOnInit(): void {
  }

}
