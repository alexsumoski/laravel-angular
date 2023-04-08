import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Auth } from '../classes/auth';
import { User } from '../interfaces/user';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-secure',
  templateUrl: './secure.component.html',
  styleUrls: ['./secure.component.scss']
})
export class SecureComponent {
  user: User;

  constructor(
    private authService: AuthService,
    private router: Router
  ) {
  }

  ngOnInit(): void {
    this.authService.user().subscribe({
      next: () => console.log('success'),
      error: () => this.router.navigate(['/login'])
    });
  }
}
