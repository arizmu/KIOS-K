# KiosK-v1 - Queue Management System

## Project Overview

KiosK-v1 is a modern queue management system (Sistem Antrian) for service centers, offices, and institutions. The system enables visitors to take queue tickets and allows staff to manage and call queue numbers efficiently with real-time display updates.

## Tech Stack

### Backend
- **PHP**: ^8.3
- **Framework**: Laravel 13.8
- **WebSocket Server**: Laravel Reverb 1.0
- **Database**: SQLite (development)
- **Queue**: Laravel Queue (with listeners)

### Frontend
- **Build Tool**: Vite 8.0.0
- **CSS Framework**: Tailwind CSS 4.0.0
- **UI Components**: FlyonUI 2.4.1
- **JavaScript Framework**: Alpine.js 3.15.12
- **Real-time**: Laravel Echo 2.3.7 + Pusher.js 8.5.0
- **HTTP Client**: Axios 1.18.0

### Development Tools
- **Testing**: Pest PHP 4.7
- **Code Quality**: Laravel Pint 1.27
- **Process Management**: Concurrently 9.0.1
- **Font Management**: Laravel Vite Fonts (Instrument Sans)

## Architecture

### Database Schema

#### Users Table
- Stores user authentication and authorization
- Fields: `id`, `name`, `email`, `password`, `role`
- Default roles: admin, staff
- Features email verification support

#### Tickets Table
- Core queue management data
- Fields:
  - `id` (primary key)
  - `nama` (optional visitor name)
  - `no_antrian` (queue number like "A-023")
  - `catatan` (notes/remarks)
  - `tanggal` (date of visit)
  - `status` (enum: 'open', 'pending', 'called', 'done', 'cancel', 'close')
- Default status: 'open'
- Tracks queue lifecycle from creation to completion

#### Lokets Table
- Service counter/station management
- Fields:
  - `id` (UUID primary key)
  - `loket` (counter name)
  - `keterangan` (description)
  - `is_active` (boolean for active status)
- Uses UUID for security and scalability

#### App Configs Table
- Application configuration and branding
- Fields:
  - `instansi_name` (institution name)
  - `instansi_address` (address)
  - `instansi_phone`, `instansi_email` (contact info)
  - `logo` (logo file path)
  - `active_theme` (theme selection)
  - `footer_text` (footer information)
  - Social media links (Facebook, Instagram, Twitter)

### Core Features

#### 1. Queue Ticket Generation
- **Endpoint**: `/create-ticket` (POST)
- Generates sequential queue numbers
- Supports anonymous (umum) and named visitors
- Optional notes field for special requirements
- Date-based filtering for daily queues

#### 2. Queue Management (Pemanggil)
- **Endpoint**: `/pemanggil` (GET)
- **Dashboard**: View waiting queues
- **Features**:
  - Real-time queue list refresh
  - Status indicators for queue items
  - Customer information display
  - Time-based ordering

#### 3. Queue Calling System
- **Endpoint**: `/pemanggil/panggil-antrian/{id}` (POST)
- **Real-time Broadcast**:
  - Uses Laravel Reverb for WebSocket communication
  - Private channel: `panggil-antrian`
  - Event: `antrian`
- **Broadcast Data**:
  - Queue number (`no_antrian`)
  - Customer name (`nama`)
  - Counter/loket assignment
  - Timestamp and metadata

#### 4. Display System
- **Endpoint**: `/display` (GET)
- **Features**:
  - Large format queue number display
  - Real-time updates via WebSocket
  - Service counter information
  - Clock and date display
  - Marquee footer for announcements
  - Glassmorphism UI design
  - Responsive layout for various screen sizes

#### 5. Counter Management (Teller)
- **Endpoint**: `/teller` (GET)
- **CRUD Operations**:
  - Create counters
  - Update counter details
  - Deactivate counters
  - List active/inactive counters

#### 6. User Management (Pengguna)
- **Endpoint**: `/pengguna` (GET)
- **Features**:
  - Admin user creation
  - Role-based access control
  - User authentication
  - Password hashing and validation

#### 7. Application Configuration
- **Endpoint**: `/app-config` (GET)
- **Features**:
  - Institution branding
  - Logo upload/management
  - Contact information
  - Theme customization
  - Footer text configuration

### Real-time Communication

#### Laravel Reverb Setup
- **Protocol**: WebSocket (WS/WSS)
- **Default Port**: 8080 (development)
- **Channel Types**: Private channels for secure communication
- **Authentication**: Custom authorizer with CSRF protection

#### Broadcasting Events
- **Event Class**: `PanggilAntrian` (implements `ShouldBroadcast`)
- **Channel**: `private-panggil-antrian`
- **Payload**: Queue details with counter assignment

#### Frontend WebSocket Integration
- **Library**: Laravel Echo with Pusher.js adapter
- **Connection**: Reverb broadcaster
- **Features**:
  - Automatic reconnection
  - Connection status monitoring
  - Real-time event handling
  - Private channel authentication

### Security Features

1. **Authentication**
   - Session-based authentication
   - Database session driver
   - CSRF token protection
   - Password hashing (bcrypt)

2. **Authorization**
   - Role-based access control
   - Guest middleware for public pages
   - Auth middleware for protected routes

3. **Input Validation**
   - Laravel validation rules
   - Mass assignment protection
   - SQL injection prevention (Eloquent ORM)

4. **WebSocket Security**
   - Private channels
   - CSRF token validation for socket connections
   - Origin-based access control

### Frontend Architecture

#### Component Structure
- **Layouts**: Blade components for consistent UI
- **Pages**: Modular page templates
- **Alpine.js**: Reactive component state management
- **Tailwind CSS**: Utility-first styling

#### Responsive Design
- Mobile-first approach
- Flexbox and Grid layouts
- Responsive typography
- Touch-friendly interface

### Development Workflow

#### Available Commands

```bash
# Initial setup
composer run setup

# Development (with hot reload)
composer run dev
# Runs: PHP server, Queue listener, Vite dev server

# Testing
composer run test

# Building for production
npm run build
```

#### Environment Configuration
- Environment variables in `.env`
- Separate development and production configs
- Database connection settings
- WebSocket server configuration

## File Structure

```
kiosk-maros/
├── app/
│   ├── Events/
│   │   └── PanggilAntrian.php      # Broadcasting event
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php  # Dashboard
│   │   │   ├── LoginController.php # Authentication
│   │   │   ├── PemanggilController.php # Queue calling
│   │   │   ├── TellerController.php    # Counter management
│   │   │   ├── PenggunaController.php  # User management
│   │   │   ├── TicketController.php    # Ticket creation
│   │   │   └── AppConfigController.php # App config
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php                 # User model
│   │   ├── Ticket.php               # Queue ticket model
│   │   ├── Loket.php                # Counter model
│   │   └── AppConfig.php            # Configuration model
│   └── Providers/
├── config/
│   ├── reverb.php                   # WebSocket config
│   ├── broadcasting.php             # Broadcasting setup
│   └── ...
├── database/
│   ├── migrations/
│   │   ├── create_tickets_table.php
│   │   ├── create_lokets_table.php
│   │   ├── create_users_table.php
│   │   └── create_app_configs_table.php
│   └── database.sqlite
├── resources/
│   ├── views/
│   │   ├── layouts/                 # Blade layouts
│   │   ├── pages/
│   │   │   ├── pemanggil.blade.php  # Queue calling interface
│   │   │   └── ...
│   │   ├── display.blade.php        # Queue display screen
│   │   └── login.blade.php          # Login page
│   ├── js/
│   │   ├── app.js                   # Main JavaScript
│   │   └── echo.js                  # WebSocket setup
│   └── css/
│       └── app.css                  # Main styles
├── routes/
│   ├── web.php                      # Web routes
│   ├── channels.php                 # Broadcasting channels
│   └── console.php                  # Console routes
├── tests/
│   ├── Feature/                     # Feature tests
│   └── Unit/                        # Unit tests
├── vendor/                          # PHP dependencies
└── public/                          # Public assets
```

## Key Implementation Details

### Queue Number Generation
- Sequential numbering system
- Format: {Letter}-{Number} (e.g., A-023)
- Date-based filtering
- Status tracking for queue lifecycle

### WebSocket Integration
- Laravel Reverb for real-time features
- Private channels for security
- Automatic reconnection handling
- Connection status monitoring

### Display Synchronization
- Multiple display screens can connect simultaneously
- Real-time queue number updates
- Counter assignment notifications
- Timestamp synchronization

### Responsive UI
- Tailwind CSS for styling
- Alpine.js for interactivity
- FlyonUI components for consistency
- Mobile and desktop support

## Performance Considerations

1. **Database Optimization**
   - Indexes on frequently queried fields
   - Date-based filtering for queue retrieval
   - Efficient status queries

2. **WebSocket Performance**
   - Private channels reduce unnecessary broadcasts
   - Connection pooling
   - Activity timeout configuration

3. **Frontend Performance**
   - Vite for optimized builds
   - Code splitting
   - Lazy loading where appropriate

4. **Caching Strategy**
   - Database cache driver
   - Redis support for production
   - Session caching

## Deployment Considerations

1. **Production Environment**
   - Secure WebSocket connections (WSS)
   - Redis for queue management
   - Database optimization
   - Asset minification

2. **Security Measures**
   - Environment variable protection
   - HTTPS enforcement
   - CORS configuration
   - Rate limiting

3. **Scalability**
   - Redis for WebSocket scaling
   - Queue workers for background tasks
   - Load balancing support
   - Database connection pooling

## Future Enhancements

1. **Feature Additions**
   - Voice announcements (TTS)
   - SMS notifications
   - Analytics dashboard
   - Reporting system
   - Multi-language support

2. **Technical Improvements**
   - API rate limiting
   - Advanced caching strategies
   - Performance monitoring
   - Automated testing coverage

3. **User Experience**
   - Mobile app companion
   - Remote queue checking
   - Appointment scheduling
   - Feedback collection

## Maintenance

### Regular Tasks
- Database backup and optimization
- Log rotation and analysis
- Security updates
- Dependency management

### Monitoring
- WebSocket connection health
- Queue processing performance
- System resource usage
- Error tracking

## Conclusion

KiosK-v1 is a comprehensive queue management system designed for modern service environments. It combines robust backend architecture with an intuitive frontend interface, leveraging real-time communication for seamless queue management. The system is built with scalability, security, and user experience as core principles.

---

**Version**: 1.0  
**Last Updated**: June 2026  
**License**: MIT