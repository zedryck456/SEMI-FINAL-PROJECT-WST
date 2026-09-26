<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

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

        .navbar {
            background: #878F56;
            color: white;
            padding: 20px 40px;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-card {
            background: #F7F7F3;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #AFB6AF;
            box-shadow: 0 3px 10px rgba(70, 75, 55, 0.12);
        }

        .form-card h2 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #555844;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555844;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #AFB6AF;
            background: white;
            color: #444;
            border-radius: 7px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
        }

        .form-control:focus {
            border-color: #878F56;
            box-shadow: 0 0 0 3px rgba(135, 143, 86, 0.15);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .errors {
            background: #E4E6DD;
            border: 1px solid #ADB782;
            color: #5b6141;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .update-button {
            background: #878F56;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .update-button:hover {
            background: #6f7745;
        }

        .back-button {
            background: #AFB6AF;
            color: #4d514c;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-size: 15px;
            font-weight: bold;
        }

        .back-button:hover {
            background: #93958A;
            color: white;
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 18px 20px;
            }

            .container {
                margin: 25px auto;
            }

            .form-card {
                padding: 22px;
            }

            .form-actions {
                flex-direction: column;
            }

            .update-button,
            .back-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>Personal Task Manager</h1>
    </div>

    <div class="container">

        <div class="form-card">

            <h2>Edit Task</h2>

            @if ($errors->any())

                <div class="errors">

                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <form
                action="{{ route('tasks.update', $task) }}"
                method="POST"
            >

                @csrf

                @method('PUT')

                <div class="form-group">

                    <label for="task_name">
                        Task Name
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        class="form-control"
                        value="{{ old('task_name', $task->task_name) }}"
                        placeholder="Enter task name"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        placeholder="Describe your task..."
                    >{{ old('description', $task->description) }}</textarea>

                </div>

                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="form-control"
                    >

                        <option
                            value="Pending"
                            {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Completed"
                            {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        class="form-control"
                        value="{{ old('due_date', $task->due_date) }}"
                    >

                </div>

                <div class="form-actions">

                    <button
                        type="submit"
                        class="update-button"
                    >
                        Update Task
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="back-button"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>