import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { environment } from "../../environments/environment";
import { Car } from "../interface/car";
import { ClientRequest } from '../interface/request';
@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private apiUrl = environment.apiUrl
  constructor( private http: HttpClient ){}

  saveRequest(data: ClientRequest){
    data.carModel = `/api/cars/${data.carModel}`
    return this.http.post(`${this.apiUrl}/requests`, data);
  }
  getCars(){
    let headers = new HttpHeaders();
    headers.append('Accept', 'application/json');
    return this.http.get<Car[]>(`${this.apiUrl}/cars.json`, {headers: headers});
  }
}
