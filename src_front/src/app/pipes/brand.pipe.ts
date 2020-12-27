import { Pipe, PipeTransform } from '@angular/core';
import { Car } from "../interface/car";
@Pipe({
  name: 'groupbrand'
})
export class BrandPipe implements PipeTransform {

  transform(arr: Car[]): Array<any> {
    if(!arr) return [];
    let res = [];
    arr.forEach((car)=>{
      if(!res[car.brand.name]) res[car.brand.name] = {cars: [], inStock: 0};
      res[car.brand.name].cars.push(car)
      res[car.brand.name].inStock += car.totalInStock
    })
    console.log('res', res)
    return res;
  }

}
