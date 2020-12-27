import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Car } from 'src/app/interface/car';

@Component({
  selector: 'cars-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {
  @Input() cars: Car[] 
  @Output() onSelectCar = new EventEmitter()
  constructor() { }
  ngOnInit(): void {

    
  }

}
