import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PaginaAdmComponent } from './pagina-adm.component';

describe('PaginaAdmComponent', () => {
  let component: PaginaAdmComponent;
  let fixture: ComponentFixture<PaginaAdmComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PaginaAdmComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PaginaAdmComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
