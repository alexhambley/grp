<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        #
                    </th>
                    <th scope="col">
                        Role Name
                    </th>
                    <th scope="col">
                        See More
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id, entry, description, names, elements, themes FROM role ORDER BY id ASC");
                $stmt->execute();
                $stmt->bind_result($id, $entry, $desc, $names, $elements, $themes);
                while ($stmt->fetch()) {
                    $id = htmlentities($id);
                    $entry = htmlentities($entry);
                    $desc = htmlentities($desc);
                    $names = htmlentities($names);
                    $elements = htmlentities($elements);
                    $themes = htmlentities($themes);
                    echo "<tr>";
                        echo "<th scope=\"row\"> $id </th>";
                        echo "<td> $entry </td>";
                        echo "<td>";
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#role_mod$id\">See More</button>";
                            // Modal 
                            echo "<div class=\"modal fade\" id=\"role_mod$id\" role=\"dialog\">";
                                echo "<div class=\"modal-dialog\">";
                                    // Modal content 
                                    echo "<div class=\"modal-content\">";
                                        echo "<div class=\"modal-header\">";
                                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                                            // This is the heading
                                            echo "<h4 class=\"modal-title\">$entry</h4>";
                                        echo "</div>";
                                        echo "<div class=\"modal-body\">";
                                            // This is the description
                                            echo "<p>$desc</p>";
                                            echo "<h5> Example jobs: </h5>";
                                            $example_roles = explode(",", $names);
                                            $counter = 0;
                                            while($counter != count($example_roles)) {
                                                echo "<li class=\"list-group-item\">$example_roles[$counter]</li>";
                                                $counter++;   
                                            }                                 
                                        echo "</div>";
                                    echo "<div class=\"modal-footer\">";
                                        echo "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>