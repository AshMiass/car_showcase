import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProcessAcceptComponent } from './process-accept.component';

describe('ProcessAcceptComponent', () => {
  let component: ProcessAcceptComponent;
  let fixture: ComponentFixture<ProcessAcceptComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProcessAcceptComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProcessAcceptComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
