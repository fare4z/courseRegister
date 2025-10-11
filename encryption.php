<?php 
include_once "include/header.php";
?>

<div class="row">
    <div class="col-lg-8 mx-auto">
        
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <h4 class="mb-0"><i class="fas fa-key me-2"></i>Original Password</h4>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-info border-0" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Plain Text Password:</strong> 
                    <code class="bg-light text-dark px-2 py-1 rounded"><?php 
                    $password = "password"; 
                    echo $password; ?></code>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            
            <div class="col-md-6">
                <div class="card h-100 shadow border-0">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>MD5 Hash</h5>
                        <small class="text-muted">Not Recommended</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="text-warning"><i class="fas fa-code me-2"></i>Syntax:</h6>
                            <code class="bg-light text-dark p-2 rounded d-block small">
                                $md5_hash = md5($password);
                            </code>
                        </div>
                        <p class="card-text">
                            <strong>Result:</strong><br>
                            <code class="small text-break"><?php 
                            // Encrypt password using MD5
                            $md5_pass = md5($password); 
                            echo $md5_pass; ?></code>
                        </p>
                        <div class="alert alert-warning border-0 small">
                            <i class="fas fa-shield-alt me-1"></i>
                            Vulnerable to rainbow table attacks
                        </div>
                    </div>
                </div>
            </div>

            <!-- SHA1 Card -->
            <div class="col-md-6">
                <div class="card h-100 shadow border-0">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0"><i class="fas fa-times-circle me-2"></i>SHA1 Hash</h5>
                        <small class="opacity-75">❌ Deprecated</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="text-danger"><i class="fas fa-code me-2"></i>Syntax:</h6>
                            <code class="bg-light text-dark p-2 rounded d-block small">
                                $sha1_hash = sha1($password);
                            </code>
                        </div>
                        <p class="card-text">
                            <strong>Result:</strong><br>
                            <code class="small text-break"><?php 
                            // Encrypt password using SHA1
                            $sha1_pass = sha1($password); 
                            echo $sha1_pass; ?></code>
                        </p>
                        <div class="alert alert-danger border-0 small">
                            <i class="fas fa-ban me-1"></i>
                            Cryptographically broken
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Method -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i>Recommended: password_hash()</h4>
                <small class="opacity-75">✅ Industry Standard</small>
            </div>
            <div class="card-body p-4">
                <?php 
                /* Recommend guna password_hash untuk real application. Supaya lebih secure. 

                Algorithm yang boleh digunakan:
                - PASSWORD_BCRYPT
                - PASSWORD_ARGON2I
                - PASSWORD_ARGON2ID
                - PASSWORD_DEFAULT (akan tukar ikut versi PHP)

                Untuk login guna password_verify($plain_password, $hashed_password) untuk check. Akan return true kalau match, false kalau tak match.

                */
                $password_hash = password_hash($password, PASSWORD_DEFAULT); 
                ?>
                
                <div class="row">
                    <div class="col-12">
                        <div class="bg-light rounded p-3 mb-3">
                            <strong>Hashed Password:</strong><br>
                            <code class="text-success small text-break"><?php echo $password_hash; ?></code>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="border rounded p-3 h-100">
                            <h6 class="text-success"><i class="fas fa-cog me-2"></i>Available Algorithms:</h6>
                            <ul class="list-unstyled mb-0 small">
                                <li><span class="badge bg-secondary me-2">BCRYPT</span>Default choice</li>
                                <li><span class="badge bg-secondary me-2">ARGON2I</span>Memory-hard</li>
                                <li><span class="badge bg-secondary me-2">ARGON2ID</span>Hybrid approach</li>
                                <li><span class="badge bg-secondary me-2">DEFAULT</span>Auto-updates</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border rounded p-3 h-100">
                            <h6 class="text-info"><i class="fas fa-lightbulb me-2"></i>Security Benefits:</h6>
                            <ul class="list-unstyled mb-0 small">
                                <li>Built-in salt generation</li>
                                <li>Configurable cost factor</li>
                                <li>Resistant to rainbow tables</li>
                                <li>Time-based security</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="fas fa-user-check me-2"></i>Login Verification Demo</h4>
            </div>
            <div class="card-body p-4">
                <?php
                // Login simulation
                $input_password = "password"; // User input password during login
                $is_password_correct = password_verify($input_password, $password_hash);
                ?>
                
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <p class="mb-2"><strong>Testing with input:</strong> <code><?php echo $input_password; ?></code></p>
                        <p class="mb-0"><strong>Verification result:</strong></p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <?php if ($is_password_correct): ?>
                            <div class="alert alert-success border-0 mb-0 py-2">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>Login Successful!</strong>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger border-0 mb-0 py-2">
                                <i class="fas fa-times-circle me-2"></i>
                                <strong>Invalid Password</strong>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Security Best Practices</h4>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-code text-primary fa-2x me-3"></i>
                            </div>
                            <div>
                                <h6 class="text-primary">For Hashing:</h6>
                                <code class="small">
                                    $hash = password_hash($password, PASSWORD_DEFAULT);
                                </code>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-key text-success fa-2x me-3"></i>
                            </div>
                            <div>
                                <h6 class="text-success">For Verification:</h6>
                                <code class="small">
                                    password_verify($input, $hash);
                                </code>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="bg-light rounded p-3">
                    <h6 class="text-warning mb-3"><i class="fas fa-exclamation-triangle me-2"></i>Important Notes:</h6>
                    <ul class="mb-0 small">
                        <li>Always use <code>password_hash()</code> for real applications</li>
                        <li>Use <code>password_verify()</code> to check passwords during login</li>
                        <li>Never store plain text passwords in database</li>
                        <li>Avoid MD5 and SHA1 for password hashing</li>
                        <li>The hash will be different each time due to random salt</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
.bg-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}

.text-break {
    word-break: break-all;
}

code {
    font-size: 0.9em;
    padding: 0.2em 0.4em;
    border-radius: 0.25rem;
    background-color: #f8f9fa;
    color: #e83e8c;
}

.alert {
    border-radius: 0.5rem;
}

.card-header {
    border-radius: 0.5rem 0.5rem 0 0 !important;
}
</style>

<?php
include_once "include/footer.php";
?>