# Secure File Upload System

## Overview
Complete file upload system with security validation, safe storage, and file management capabilities for user documents.

## Features
- **Drag & Drop Upload**: Modern drag-and-drop interface with click-to-upload fallback
- **File Validation**: Comprehensive validation for file types, sizes, and MIME types
- **Secure Storage**: Safe filename generation and path traversal protection
- **Progress Tracking**: Real-time upload progress with visual feedback
- **File Management**: List, download, and delete uploaded files
- **Database Logging**: Complete audit trail of all file operations
- **Multiple File Support**: Upload multiple files simultaneously

## Security Features
- **File Type Validation**: Whitelist of allowed file extensions and MIME types
- **Size Limits**: Configurable maximum file size (default: 10MB)
- **Filename Sanitization**: Secure filename generation to prevent attacks
- **Path Traversal Protection**: Prevents directory traversal attacks
- **MIME Type Detection**: Server-side MIME type validation using fileinfo
- **Database Logging**: Tracks all uploads with IP addresses and timestamps

## Allowed File Types
- **Documents**: PDF, DOC, DOCX
- **Images**: JPG, JPEG, PNG, GIF
- **Maximum Size**: 10MB per file
- **Multiple Files**: Yes, unlimited number of files

## Files Structure
- `index.html` - File upload interface with drag-and-drop functionality
- `upload.php` - Secure file upload handler with validation
- `list_files.php` - File listing endpoint for displaying uploaded files
- `download.php` - Secure file download handler
- `delete.php` - File deletion handler with cleanup
- `uploads/` - Directory for storing uploaded files (auto-created)
- `README.md` - Documentation and setup instructions

## Database Schema
```sql
CREATE TABLE uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_name VARCHAR(255) NOT NULL,
    stored_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    file_type VARCHAR(100) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    user_agent TEXT
);
```

## Upload Process
1. **File Selection** → User selects files via drag-drop or file picker
2. **Client Validation** → JavaScript validates file types and sizes
3. **Server Validation** → PHP validates MIME types and security checks
4. **Secure Storage** → Files stored with sanitized names and proper permissions
5. **Database Logging** → Upload details recorded in database
6. **Progress Feedback** → Real-time upload progress displayed to user

## Security Measures
- **Filename Sanitization**: Removes dangerous characters and path traversal attempts
- **MIME Type Validation**: Server-side validation using PHP fileinfo extension
- **File Size Limits**: Prevents large file uploads that could consume server resources
- **Directory Protection**: Files stored outside web root or with proper access controls
- **Extension Validation**: Whitelist approach for allowed file extensions
- **Path Traversal Prevention**: Validates file paths to prevent directory traversal

## File Management
- **Upload Multiple Files**: Select and upload multiple files at once
- **View File List**: See all uploaded files with details (name, size, type, date)
- **Download Files**: Secure download with proper headers and access control
- **Delete Files**: Remove files from both disk and database
- **File Icons**: Visual file type indicators for better user experience

## Error Handling
- **Invalid File Types**: Clear error messages for unsupported file types
- **Size Exceeded**: Warnings when files exceed maximum size limit
- **Upload Failures**: Detailed error reporting for failed uploads
- **Network Errors**: Graceful handling of network connectivity issues
- **Server Errors**: Proper error responses for server-side failures

## Configuration Options
- **Maximum File Size**: Configurable in `upload.php` (default: 10MB)
- **Allowed Types**: Modify `$allowed_types` and `$allowed_extensions` arrays
- **Upload Directory**: Change `$upload_dir` variable for different storage location
- **Database Settings**: Configure database connection parameters
- **Security Headers**: Customize security headers as needed

## Installation & Setup
1. **Create Upload Directory**: Ensure `uploads/` directory exists with write permissions
2. **Database Setup**: MySQL database will be created automatically
3. **PHP Configuration**: Ensure `fileinfo` extension is enabled
4. **File Permissions**: Set appropriate permissions on upload directory (755)
5. **Web Server**: Configure web server to serve files securely

## Usage Examples
- **Document Management**: Upload and manage business documents
- **Image Gallery**: Store and display user-uploaded images
- **File Sharing**: Secure file sharing with download links
- **Document Verification**: Upload identity documents for verification
- **Portfolio Management**: Upload and showcase work samples

## Performance Considerations
- **File Size Limits**: Balance between user needs and server resources
- **Storage Space**: Monitor disk usage for uploaded files
- **Database Growth**: Regular cleanup of old file records
- **Concurrent Uploads**: Handle multiple simultaneous uploads
- **Progress Tracking**: Efficient progress reporting for large files

## Browser Compatibility
- **Modern Browsers**: Full drag-and-drop support in Chrome, Firefox, Safari, Edge
- **Fallback Support**: Click-to-upload works in all browsers
- **Progress API**: Upload progress supported in modern browsers
- **File API**: HTML5 File API for client-side validation
- **FormData**: XMLHttpRequest Level 2 for file uploads

## Production Deployment
1. **SSL Certificate**: Use HTTPS for secure file uploads
2. **File Permissions**: Set restrictive permissions on upload directory
3. **Virus Scanning**: Consider integrating virus scanning for uploaded files
4. **Backup Strategy**: Regular backups of uploaded files and database
5. **Monitoring**: Monitor upload activity and storage usage

## No Setup Required
- Database tables created automatically on first use
- Upload directory created automatically if missing
- Works immediately after copying files to web server
- No external dependencies or API keys required