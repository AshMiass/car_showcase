import { Component, Input } from '@angular/core';
import { Car } from 'src/app/interface/car';

@Component({
  selector: 'car-card',
  templateUrl: './car-card.component.html',
  styleUrls: ['./car-card.component.css']
})
export class CarCardComponent {
  @Input() car: Car
  constructor() { }
}
