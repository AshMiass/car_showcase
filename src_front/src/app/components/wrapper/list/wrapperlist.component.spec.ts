import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { WrapperListComponent } from './wrapperlist.component';

describe('ListComponent', () => {
  let component: WrapperListComponent;
  let fixture: ComponentFixture<WrapperListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ WrapperListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(WrapperListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
