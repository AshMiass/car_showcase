import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatDialog } from '@angular/material/dialog';
import { Car } from 'src/app/interface/car';
import { ClientRequest } from 'src/app/interface/request';
import { PersonalDataProcessingPolicyComponent } from '../personal-data/data-processing-policy/data-processing-policy.component';
import { PersonalDataProcessAcceptComponent } from '../personal-data/process-accept/process-accept.component';

@Component({
  selector: 'cars-request',
  templateUrl: './request.component.html',
  styleUrls: ['./request.component.css']
})
export class RequestComponent {
  @Input() car: Car
  @Output() onCancel = new EventEmitter()
  @Output() onAccept = new EventEmitter()
  public requestForm: FormGroup
  constructor(private fb: FormBuilder, public dialog: MatDialog) { 
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
 openPersonalDataProcessingPolicyDialog(){
      this.dialog.open(PersonalDataProcessingPolicyComponent, {})
 }
 openPersonalDataProcessAcceptDialog(){
      this.dialog.open(PersonalDataProcessAcceptComponent, {})
 }

}
