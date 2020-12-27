import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Car } from 'src/app/interface/car';
import { ClientRequest } from 'src/app/interface/request';

@Component({
  selector: 'cars-request',
  templateUrl: './request.component.html',
  styleUrls: ['./request.component.css']
})
export class RequestComponent implements OnInit {
  @Input() car: Car
  @Output() onCancel = new EventEmitter()
  @Output() onAccept = new EventEmitter()
  public requestForm: FormGroup
  constructor(private fb: FormBuilder) { 
      this.requestForm = this.fb.group({
          clientName: ['', [Validators.minLength(2), Validators.required]],
          clientPhone: ['', [Validators.pattern(/[0-9]{10}/gm), Validators.required]],
          clientEmail: ['', [Validators.email, Validators.required]],
          accepted: [false, Validators.requiredTrue]
      });
  }
  onSubmit(formValues){
    let request_data: ClientRequest = {carModel: this.car.id, ... formValues}
    const regex = /[0-9]{10}/gm;
    let result = request_data.clientPhone.match(regex);
    let phone = result.length? result[0] : null;
    request_data.clientPhone = phone;
    console.log('onSubmit', request_data)
    this.onAccept.emit(request_data)
  }
  get formControls(): any {
    return this.requestForm['controls'];
 }
  ngOnInit(): void {
  }

}
