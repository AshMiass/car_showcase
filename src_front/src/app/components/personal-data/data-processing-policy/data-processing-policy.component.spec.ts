import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DataProcessingPolicyComponent } from './data-processing-policy.component';

describe('DataProcessingPolicyComponent', () => {
  let component: DataProcessingPolicyComponent;
  let fixture: ComponentFixture<DataProcessingPolicyComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DataProcessingPolicyComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DataProcessingPolicyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
