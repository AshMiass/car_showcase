import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Car } from 'src/app/interface/car';
// import { GroupByPipe } from 'ngx-pipes';

@Component({
  selector: 'cars-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent {
  @Input() cars: Car[] 
  @Output() onSelectCar = new EventEmitter()
  constructor() { }
}
