<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Tasks</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #C4C7BC;
            color: #333;
        }

        /* Navigation */
        .navbar {
            background: #878F56;
            color: white;
            padding: 20px 40px;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Main container */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Page heading */
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top-section h2 {
            margin: 0;
            font-size: 28px;
            color: #555844;
        }

        /* Add button */
        .add-button {
            display: inline-block;
            background: #878F56;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-button:hover {
            background: #6f7745;
        }

        /* Statistics */
        .statistics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            display: block;
            background: #F7F7F3;
            padding: 22px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid #AFB6AF;
            box-shadow: 0 3px 10px rgba(70, 75, 55, 0.12);
            text-decoration: none;
            color: inherit;
            transition: 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(70, 75, 55, 0.18);
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #878F56;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #93958A;
            font-size: 14px;
            font-weight: bold;
        }

        /* Selected filter */
        .stat-card.active {
            border: 3px solid #878F56;
            background: #EEF0E7;
        }

        /* Task section title */
        .task-section-title {
            margin-bottom: 18px;
        }

        .task-section-title h3 {
            margin: 0;
            color: #555844;
            font-size: 20px;
        }

        .task-section-title p {
            margin: 5px 0 0;
            color: #93958A;
            font-size: 14px;
        }

        /* Task card */
        .task-card {
            background: #F7F7F3;
            padding: 22px;
            margin-bottom: 18px;
            border-radius: 12px;
            border: 1px solid #AFB6AF;
            box-shadow: 0 3px 10px rgba(70, 75, 55, 0.12);
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .task-header h3 {
            margin: 0;
            font-size: 21px;
            color: #555844;
        }

        /* Description */
        .description {
            color: #6f7268;
            margin: 12px 0;
            line-height: 1.5;
        }

        /* Task information */
        .task-info {
            margin-top: 15px;
            font-size: 14px;
            color: #777a70;
        }

        /* Status */
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .pending {
            background: #ADB782;
            color: #4f5535;
        }

        .completed {
            background: #AFB6AF;
            color: #4d514c;
        }

        /* Actions */
        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .edit-button {
            background: #878F56;
            color: white;
            text-decoration: none;
            padding: 9px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
        }

        .edit-button:hover {
            background: #6f7745;
        }

        .delete-button {
            background: #93958A;
            color: white;
            border: none;
            padding: 9px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .delete-button:hover {
            background: #777970;
        }

        /* Empty state */
        .empty {
            background: #F7F7F3;
            padding: 50px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #AFB6AF;
            box-shadow: 0 3px 10px rgba(70, 75, 55, 0.12);
        }

        .empty h3 {
            margin-top: 0;
            color: #555844;
        }

        .empty p {
            color: #93958A;
        }

        /* Mobile */
        @media (max-width: 600px) {

            .navbar {
                padding: 18px 20px;
            }

            .navbar h1 {
                font-size: 20px;
            }

            .container {
                margin: 25px auto;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .statistics {
                grid-template-columns: 1fr;
            }

            .task-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .actions {
                flex-direction: column;
            }

            .edit-button,
            .delete-button {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <div class="navbar">
        <h1>Personal Task Manager</h1>
    </div>

    <!-- Main content -->
    <div class="container">

        <!-- Page heading -->
        <div class="top-section">

            <h2>My Tasks</h2>

            <a
                href="{{ route('tasks.create') }}"
                class="add-button"
            >
                + Add New Task
            </a>

        </div>

        <!-- Statistics -->
        <div class="statistics">

            <!-- Total -->
            <a
                href="{{ route('tasks.index') }}"
                class="stat-card {{ !$filter ? 'active' : '' }}"
            >
                <div class="stat-number">
                    {{ $totalTasks }}
                </div>

                <div class="stat-label">
                    Total Tasks
                </div>
            </a>

            <!-- Pending -->
            <a
                href="{{ route('tasks.index', ['filter' => 'pending']) }}"
                class="stat-card {{ $filter === 'pending' ? 'active' : '' }}"
            >
                <div class="stat-number">
                    {{ $pendingTasks }}
                </div>

                <div class="stat-label">
                    Pending
                </div>
            </a>

            <!-- Completed -->
            <a
                href="{{ route('tasks.index', ['filter' => 'completed']) }}"
                class="stat-card {{ $filter === 'completed' ? 'active' : '' }}"
            >
                <div class="stat-number">
                    {{ $completedTasks }}
                </div>

                <div class="stat-label">
                    Completed
                </div>
            </a>

        </div>

        <!-- Current filter -->
        <div class="task-section-title">

            @if ($filter === 'pending')

                <h3>Pending Tasks</h3>

                <p>
                    Showing all tasks that are currently pending.
                </p>

            @elseif ($filter === 'completed')

                <h3>Completed Tasks</h3>

                <p>
                    Showing all completed tasks.
                </p>

            @else

                <h3>All Tasks</h3>

                <p>
                    Showing all of your tasks.
                </p>

            @endif

        </div>

        <!-- Tasks -->
        @if ($tasks->count() > 0)

            @foreach ($tasks as $task)

                <div class="task-card">

                    <!-- Task header -->
                    <div class="task-header">

                        <h3>
                            {{ $task->task_name }}
                        </h3>

                        @if ($task->status === 'Completed')

                            <span class="status completed">
                                Completed
                            </span>

                        @else

                            <span class="status pending">
                                Pending
                            </span>

                        @endif

                    </div>

                    <!-- Description -->
                    <p class="description">
                        {{ $task->description ?: 'No description provided.' }}
                    </p>

                    <!-- Due date -->
                    <div class="task-info">

                        <strong>Due Date:</strong>

                        {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No due date' }}

                    </div>

                    <!-- Actions -->
                    <div class="actions">

                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('tasks.destroy', $task) }}"
                            method="POST"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-button"
                                onclick="return confirm('Are you sure you want to delete this task?')"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        @else

            <!-- Empty state -->
            <div class="empty">

                @if ($filter === 'pending')

                    <h3>No pending tasks</h3>

                    <p>
                        You don't have any pending tasks right now.
                    </p>

                @elseif ($filter === 'completed')

                    <h3>No completed tasks</h3>

                    <p>
                        You haven't completed any tasks yet.
                    </p>

                @else

                    <h3>No tasks yet</h3>

                    <p>
                        Create your first task to get started.
                    </p>

                @endif

                <br>

                @if ($filter)

                    <a
                        href="{{ route('tasks.index') }}"
                        class="add-button"
                    >
                        View All Tasks
                    </a>

                @else

                    <a
                        href="{{ route('tasks.create') }}"
                        class="add-button"
                    >
                        + Add New Task
                    </a>

                @endif

            </div>

        @endif

    </div>

</body>
</html>